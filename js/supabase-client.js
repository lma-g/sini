// ==============================================
// Supabase Client Configuration
// ==============================================
// Project: mgdProject (xojvjbkaoqjzoxlloxor)
// ==============================================

const SUPABASE_URL = 'https://xojvjbkaoqjzoxlloxor.supabase.co';
// Publishable key - safe to expose in frontend code.
const SUPABASE_ANON_KEY = 'sb_publishable_-z6HR9iab2yceJNbN-LuBA_z9LK3vCi';

// Initialize Supabase client (loaded from CDN in HTML)
const supabase = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY, {
  auth: {
    persistSession: true,
    autoRefreshToken: true,
    storage: window.localStorage,
  },
});

// Expose globally
window.supabaseClient = supabase;

// ==============================================
// AUTH HELPERS
// ==============================================

/**
 * Sign up a new user with email and password.
 * Stores additional profile data (username) in user metadata.
 */
async function signUp(email, password, username) {
  const { data, error } = await supabase.auth.signUp({
    email,
    password,
    options: {
      data: { username, role: 'customer' },
    },
  });
  return { data, error };
}

/** Sign in with email and password. */
async function signIn(email, password) {
  const { data, error } = await supabase.auth.signInWithPassword({
    email,
    password,
  });
  return { data, error };
}

/** Sign out current user. */
async function signOut() {
  const { error } = await supabase.auth.signOut();
  return { error };
}

/** Get the currently logged-in user (null if not logged in). */
async function getCurrentUser() {
  const { data: { user } } = await supabase.auth.getUser();
  return user;
}

// ==============================================
// PRODUCTS HELPERS
// ==============================================

/** Fetch all products. */
async function fetchProducts() {
  const { data, error } = await supabase
    .from('products')
    .select('*')
    .order('created_at', { ascending: false });
  return { data, error };
}

/** Fetch products by category. */
async function fetchProductsByCategory(category) {
  const { data, error } = await supabase
    .from('products')
    .select('*')
    .eq('category', category)
    .order('created_at', { ascending: false });
  return { data, error };
}

/** Fetch a single product by id. */
async function fetchProductById(id) {
  const { data, error } = await supabase
    .from('products')
    .select('*')
    .eq('id', id)
    .single();
  return { data, error };
}

// ==============================================
// CART HELPERS (localStorage-based for guest users)
// ==============================================

const CART_KEY = 'rawaq_cart';

function getCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY)) || [];
  } catch {
    return [];
  }
}

function saveCart(items) {
  localStorage.setItem(CART_KEY, JSON.stringify(items));
  updateCartCount();
}

function addToCart(productId, quantity = 1) {
  const cart = getCart();
  const existing = cart.find((item) => item.product_id === productId);
  if (existing) {
    existing.quantity += quantity;
  } else {
    cart.push({ product_id: productId, quantity });
  }
  saveCart(cart);
}

function removeFromCart(productId) {
  const cart = getCart().filter((item) => item.product_id !== productId);
  saveCart(cart);
}

function clearCart() {
  saveCart([]);
}

function updateCartCount() {
  const count = getCart().reduce((sum, i) => sum + i.quantity, 0);
  const badges = document.querySelectorAll('.cart-count, [data-cart-count]');
  badges.forEach((b) => (b.textContent = count));
}

// ==============================================
// ORDERS HELPERS (requires authenticated user)
// ==============================================

/**
 * Create an order from current cart for the logged-in user.
 * @param {object} shippingInfo - { city, street_address, nearest_landmark, payment_method }
 */
async function createOrder(shippingInfo) {
  const user = await getCurrentUser();
  if (!user) return { error: { message: 'يجب تسجيل الدخول أولاً' } };

  const cart = getCart();
  if (cart.length === 0) return { error: { message: 'السلة فارغة' } };

  // Fetch product prices to calculate total securely
  const productIds = cart.map((c) => c.product_id);
  const { data: products, error: prodErr } = await supabase
    .from('products')
    .select('id, price')
    .in('id', productIds);
  if (prodErr) return { error: prodErr };

  const priceMap = Object.fromEntries(products.map((p) => [p.id, Number(p.price)]));
  const total = cart.reduce(
    (sum, item) => sum + (priceMap[item.product_id] || 0) * item.quantity,
    0,
  );

  // Insert order
  const { data: order, error: orderErr } = await supabase
    .from('orders')
    .insert({
      user_id: user.id, // NOTE: requires migrating users table to use auth.uid()
      total_amount: total,
      status: 'pending',
      payment_method: shippingInfo.payment_method || 'cod',
      shipping_address: `${shippingInfo.city || ''} - ${shippingInfo.street_address || ''}`,
      city: shippingInfo.city,
      street_address: shippingInfo.street_address,
      nearest_landmark: shippingInfo.nearest_landmark,
    })
    .select()
    .single();
  if (orderErr) return { error: orderErr };

  // Insert order items
  const orderItems = cart.map((item) => ({
    order_id: order.id,
    product_id: item.product_id,
    quantity: item.quantity,
    price_at_purchase: priceMap[item.product_id] || 0,
  }));
  const { error: itemsErr } = await supabase.from('order_items').insert(orderItems);
  if (itemsErr) return { error: itemsErr };

  clearCart();
  return { data: order };
}

// Expose helpers globally
window.signUp = signUp;
window.signIn = signIn;
window.signOut = signOut;
window.getCurrentUser = getCurrentUser;
window.fetchProducts = fetchProducts;
window.fetchProductsByCategory = fetchProductsByCategory;
window.fetchProductById = fetchProductById;
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;
window.getCart = getCart;
window.clearCart = clearCart;
window.updateCartCount = updateCartCount;
window.createOrder = createOrder;

// Initialize cart count on page load
document.addEventListener('DOMContentLoaded', updateCartCount);
