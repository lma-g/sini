// ==============================================
// Products Loader - Fetches products from Supabase
// and renders them into category containers.
// ==============================================

/**
 * Render a single product card matching existing CSS structure.
 */
function renderProductCard(product) {
  const imagePath = product.image
    ? (product.image.startsWith('http') ? product.image : `ass/منتجات/${product.image}`)
    : 'ass/منتجات/P10.jpg';

  const safeName = String(product.name || '').replace(/"/g, '&quot;');
  const safeDesc = String(product.description || '').replace(/"/g, '&quot;');

  return `
    <div class="product"
         data-id="${product.id}"
         data-name="${safeName}"
         data-price="${product.price}"
         data-desc="${safeDesc}"
         data-img="${imagePath}">
      <div class="product-img-wrapper">
        <img loading="lazy" src="${imagePath}" alt="${safeName}">
        <button class="info-btn" aria-label="عرض المعلومات">
          <i class="fas fa-info-circle"></i>
        </button>
      </div>
      <div class="product-info">
        <h3>${safeName}</h3>
        <div class="rating">
          ${renderStars(product.rating || 0)}
          <span>(${Number(product.rating || 0).toFixed(1)})</span>
        </div>
        <p class="price">${Number(product.price).toFixed(2)}$</p>
        <button class="add-cart" data-product-id="${product.id}">
          <i class="fas fa-cart-plus"></i> أضف للسلة
        </button>
      </div>
    </div>
  `;
}

function renderStars(rating) {
  const r = Number(rating) || 0;
  const full = Math.floor(r);
  const half = r - full >= 0.5 ? 1 : 0;
  const empty = 5 - full - half;
  return (
    '<i class="fas fa-star"></i>'.repeat(full) +
    (half ? '<i class="fas fa-star-half-alt"></i>' : '') +
    '<i class="far fa-star"></i>'.repeat(empty)
  );
}

/**
 * Map of category id -> product category enum value in Supabase.
 * Containers in index.html have ids matching these keys.
 */
const CATEGORY_MAP = {
  rings: ['me-rings', 'wo-rings'], // Hero category section
  'me-rings': 'me-rings',
  'wo-rings': 'wo-rings',
  'wo-necklaces': 'wo-necklaces',
  'wo-bracelets': 'wo-bracelets',
  'wo-earrings': 'wo-earrings',
  'wo-sets': 'wo-sets',
  'me-beads': 'me-beads',
  stones: 'stones',
};

/**
 * Load products into a specific container by id.
 * Falls back silently to existing static HTML if Supabase is unreachable.
 */
async function loadProductsInto(containerId, category) {
  const container = document.getElementById(containerId);
  if (!container) return;

  try {
    let query = window.supabaseClient.from('products').select('*');
    if (Array.isArray(category)) {
      query = query.in('category', category);
    } else if (category) {
      query = query.eq('category', category);
    }
    const { data, error } = await query.order('created_at', { ascending: false });

    if (error) {
      console.warn('Supabase products error:', error.message);
      return; // keep static fallback
    }
    if (!data || data.length === 0) return; // keep static fallback

    container.innerHTML = data.map(renderProductCard).join('');
    bindProductEvents(container);
  } catch (err) {
    console.warn('Failed to load products:', err);
  }
}

/**
 * Re-bind click events for newly inserted product cards.
 */
function bindProductEvents(container) {
  // Add to cart
  container.querySelectorAll('.add-cart').forEach((btn) => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const id = Number(btn.dataset.productId);
      if (id && window.addToCart) {
        window.addToCart(id, 1);
        if (window.showNotification) {
          window.showNotification('تم إضافة المنتج إلى السلة', 'success');
        }
      }
    });
  });

  // Info modal (uses existing modal in index.html)
  container.querySelectorAll('.info-btn').forEach((btn) => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const product = btn.closest('.product');
      if (!product) return;
      const modal = document.getElementById('infoModal');
      const img = document.getElementById('modalImg');
      const title = document.getElementById('modalTitle');
      const desc = document.getElementById('modalDesc');
      const price = document.getElementById('modalPrice');
      if (title) title.textContent = product.dataset.name;
      if (desc) desc.textContent = product.dataset.desc;
      if (price) price.textContent = `السعر: ${product.dataset.price}$`;
      if (img) {
        img.src = product.dataset.img;
        img.alt = product.dataset.name;
      }
      if (modal) modal.classList.add('active');
    });
  });
}

/**
 * Auto-detect product containers on the page and populate them.
 * Containers are identified by their id attribute matching CATEGORY_MAP keys.
 */
async function autoLoadProducts() {
  if (!window.supabaseClient) return;

  for (const [containerId, category] of Object.entries(CATEGORY_MAP)) {
    if (document.getElementById(containerId)) {
      await loadProductsInto(containerId, category);
    }
  }
}

document.addEventListener('DOMContentLoaded', autoLoadProducts);
