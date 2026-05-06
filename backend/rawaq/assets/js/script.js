 // ========== دوال التحكم بالنافذة المنبثقة ==========
function openLoginModal() {
  window.location.href = "pages/login.html";
}

function closeLoginModal() {
  // This function is kept for compatibility but redirects to login page
  window.location.href = "pages/login.html";
}

// ========== دالة تبديل علامات التبويب ==========
function switchTab(tab) {
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");
  const tabs = document.querySelectorAll(".tab-btn");

  if (!loginForm || !signupForm) return;

  tabs.forEach((btn) => {
    btn.classList.remove("active");
  });

  if (tab === "login") {
    loginForm.classList.add("active");
    signupForm.classList.remove("active");
    if (tabs[0]) tabs[0].classList.add("active");
  } else {
    signupForm.classList.add("active");
    loginForm.classList.remove("active");
    if (tabs[1]) tabs[1].classList.add("active");
  }
}

// ========== دالة إظهار/إخفاء كلمة المرور ==========
function togglePasswordVisibility(inputId, button) {
  const passwordInput = document.getElementById(inputId);
  if (!passwordInput) return;

  const icon = button.querySelector("i");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    if (icon) {
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }
  } else {
    passwordInput.type = "password";
    if (icon) {
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
}

// ========== معالجة تسجيل الدخول ==========
function handleLogin(event) {
  event.preventDefault();

  const email = document.getElementById("modal-email");
  const password = document.getElementById("modal-password");

  if (!email || !password) return;

  const emailValue = email.value;
  const passwordValue = password.value;

  if (!emailValue || !passwordValue) {
    showNotification("الرجاء إدخال البريد الإلكتروني وكلمة المرور", "error");
    return;
  }

  if (!isValidEmail(emailValue)) {
    showNotification("الرجاء إدخال بريد إلكتروني صحيح", "error");
    return;
  }

  showNotification("تم تسجيل الدخول بنجاح!", "success");

  setTimeout(() => {
    const userLink = document.querySelector(".user span");
    if (userLink) {
      userLink.textContent = "مرحباً!";
    }
    closeLoginModal();
  }, 1500);
}

// ========== معالجة إنشاء حساب جديد ==========
function handleSignup(event) {
  event.preventDefault();

  const name = document.getElementById("modal-name");
  const email = document.getElementById("modal-signup-email");
  const password = document.getElementById("modal-signup-password");
  const confirmPassword = document.getElementById("modal-confirm-password");
  const termsAccepted = document.querySelector(
    "#signupForm .checkbox-label input"
  );

  if (!name || !email || !password || !confirmPassword) return;

  const nameValue = name.value;
  const emailValue = email.value;
  const passwordValue = password.value;
  const confirmPasswordValue = confirmPassword.value;
  const termsAcceptedValue = termsAccepted ? termsAccepted.checked : false;

  if (!nameValue || !emailValue || !passwordValue || !confirmPasswordValue) {
    showNotification("الرجاء ملء جميع الحقول", "error");
    return;
  }

  if (!isValidEmail(emailValue)) {
    showNotification("الرجاء إدخال بريد إلكتروني صحيح", "error");
    return;
  }

  if (passwordValue !== confirmPasswordValue) {
    showNotification("كلمة المرور غير متطابقة", "error");
    return;
  }

  if (passwordValue.length < 6) {
    showNotification("كلمة المرور يجب أن تكون 6 أحرف على الأقل", "error");
    return;
  }

  if (!termsAcceptedValue) {
    showNotification("الرجاء الموافقة على الشروط والأحكام", "error");
    return;
  }

  showNotification("تم إنشاء الحساب بنجاح! جاري تسجيل الدخول...", "success");

  setTimeout(() => {
    const userLink = document.querySelector(".user span");
    if (userLink) {
      userLink.textContent = "مرحباً!";
    }
    closeLoginModal();
  }, 1500);
}

// ========== معالجة تسجيل الدخول عبر وسائل التواصل ==========
function socialLogin(provider) {
  showNotification(`جاري تسجيل الدخول عبر ${provider}...`, "info");

  setTimeout(() => {
    showNotification("هذه خاصية تجريبية", "info");
  }, 1500);
}

// ========== دالة التحقق من صحة البريد الإلكتروني ==========
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// ========== دالة عرض الإشعارات ==========
function showNotification(message, type) {
  const existingNotification = document.querySelector(".notification");
  if (existingNotification) {
    existingNotification.remove();
  }

  let icon = "fa-info-circle";
  if (type === "success") icon = "fa-check-circle";
  if (type === "error") icon = "fa-exclamation-circle";
  if (type === "info") icon = "fa-info-circle";

  const notification = document.createElement("div");
  notification.className = `notification ${type}`;
  notification.innerHTML = `
        <i class="fas ${icon}"></i>
        <span>${message}</span>
    `;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.classList.add("show");
  }, 10);

  setTimeout(() => {
    notification.classList.remove("show");
    setTimeout(() => {
      notification.remove();
    }, 300);
  }, 3000);
}

// ========== تهيئة جميع الأحداث عند تحميل الصفحة ==========
document.addEventListener("DOMContentLoaded", function () {
  // ========== تأثير تغيير لون الهيدر عند التمرير ==========
  window.addEventListener("scroll", function () {
    const header = document.getElementById("header");
    if (header) {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    }
  });

  // ========== تفعيل أزرار عرض معلومات المنتج ==========
  const infoModal = document.getElementById("infoModal");
  const modalImg = document.getElementById("modalImg");
  const modalTitle = document.getElementById("modalTitle");
  const modalDesc = document.getElementById("modalDesc");
  const modalPrice = document.getElementById("modalPrice");
  const closeModalBtn = document.getElementById("closeModalBtn");

  function showProductInfo(productElement) {
    const name = productElement.getAttribute("data-name");
    const price = productElement.getAttribute("data-price");
    const desc = productElement.getAttribute("data-desc");
    const imgSrc = productElement.getAttribute("data-img");

    if (modalTitle) modalTitle.textContent = name;
    if (modalDesc) modalDesc.textContent = desc;
    if (modalPrice) modalPrice.textContent = `السعر: ${price}$`;
    if (modalImg) {
      modalImg.src = imgSrc;
      modalImg.alt = name;
    }
    if (infoModal) infoModal.classList.add("active");
  }

  const infoButtons = document.querySelectorAll(".info-btn");
  infoButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      const productDiv = btn.closest(".product");
      if (productDiv) {
        showProductInfo(productDiv);
      }
    });
  });

  if (closeModalBtn) {
    closeModalBtn.addEventListener("click", () => {
      if (infoModal) infoModal.classList.remove("active");
    });
  }

  if (infoModal) {
    infoModal.addEventListener("click", (e) => {
      if (e.target === infoModal) {
        infoModal.classList.remove("active");
      }
    });
  }

  // ========== أزرار التحكم بالكمية في واجهة المنتجات ==========
  document.querySelectorAll('.cart-action-group').forEach(group => {
    const minusBtn = group.querySelector('.minus');
    const plusBtn = group.querySelector('.plus');
    const inputQty = group.querySelector('.qty-input');
    
    if(minusBtn && plusBtn && inputQty) {
      minusBtn.addEventListener('click', () => {
        let val = parseInt(inputQty.value) || 1;
        if(val > 1) inputQty.value = val - 1;
      });
      plusBtn.addEventListener('click', () => {
        let val = parseInt(inputQty.value) || 1;
        inputQty.value = val + 1;
      });
    }
  });

  // ========== تفعيل أزرار إضافة إلى السلة (API) ==========
  const addToCartButtons = document.querySelectorAll(".add-cart");
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.getAttribute('data-id');
      const product = this.closest(".product");
      let qty = 1;
      
      if (product) {
        const inputQty = product.querySelector('.qty-input');
        if(inputQty) qty = parseInt(inputQty.value) || 1;
        
        const originalText = this.innerHTML;
        this.innerHTML = 'جاري الإضافة...';
        this.disabled = true;

        fetch('/rawaq/php/cart_api.php?action=add', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({product_id: productId, quantity: qty})
        })
        .then(res => res.json())
        .then(data => {
            this.innerHTML = originalText;
            this.disabled = false;
            if(data.success) {
                showNotification("تمت الإضافة إلى السلة بنجاح", "success");
                loadCart();
            } else {
                showNotification("حدث خطأ أثناء الإضافة", "error");
            }
        }).catch(err => {
            this.innerHTML = originalText;
            this.disabled = false;
            showNotification("خطأ في الاتصال بالخادم", "error");
        });
      }
    });
  });

  // ========== نافذة المجموعات (منبثقة) ==========
  const openBtn = document.getElementById("openMenu");
  const categoryModal = document.getElementById("categoryModal");
  const closeModal = document.querySelector(".close");

  if (openBtn && categoryModal) {
    openBtn.addEventListener("click", function (e) {
      e.preventDefault();
      categoryModal.style.display = "flex";
    });
  }

  if (closeModal && categoryModal) {
    closeModal.addEventListener("click", function () {
      categoryModal.style.display = "none";
    });
  }

  if (categoryModal) {
    window.addEventListener("click", function (e) {
      if (e.target === categoryModal) {
        categoryModal.style.display = "none";
      }
    });
  }

  // ========== سلة التسوق الجانبية ==========
  const cartBtn = document.getElementById("cartBtn");
  const cartSidebar = document.getElementById("cartSidebar");
  const closeCart = document.getElementById("closeCart");
  const overlay = document.getElementById("overlay");

  if (cartBtn && cartSidebar && overlay) {
    cartBtn.addEventListener("click", function (e) {
      e.preventDefault();
      cartSidebar.classList.add("active");
      overlay.classList.add("active");
      loadCart();
    });
  }

  if (closeCart && cartSidebar && overlay) {
    closeCart.addEventListener("click", function () {
      cartSidebar.classList.remove("active");
      overlay.classList.remove("active");
    });
  }

  if (overlay && cartSidebar) {
    overlay.addEventListener("click", function () {
      cartSidebar.classList.remove("active");
      overlay.classList.remove("active");
    });
  }

  // ========== فتح نافذة تسجيل الدخول (زر المستخدم) - ينتقل إلى login.html ==========
  const userBtn = document.getElementById("userBtn");
  if (userBtn) {
    userBtn.addEventListener("click", function (e) {
      // الرابط موجود بالفعل في HTML، لكننا نمنع السلوك الافتراضي فقط إذا أردنا
      // لا نفعل شيئاً لأن الرابط يوجه إلى login.html مباشرة
    });
  }
});

// ========== دوال إضافية للتوافق ==========
// دالة التحقق من صحة البريد الإلكتروني (إذا كانت الصفحة تحتاجها)
window.isValidEmail = function(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
};

// دالة تبديل علامات التبويب (لنافذة تسجيل الدخول)
window.switchTab = function(tab) {
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");
  const tabs = document.querySelectorAll(".tab-btn");
  
  if (!loginForm || !signupForm) return;
  
  tabs.forEach((btn) => {
    btn.classList.remove("active");
  });
  
  if (tab === "login") {
    loginForm.classList.add("active");
    signupForm.classList.remove("active");
    if (tabs[0]) tabs[0].classList.add("active");
  } else {
    signupForm.classList.add("active");
    loginForm.classList.remove("active");
    if (tabs[1]) tabs[1].classList.add("active");
  }
};

// دالة إظهار/إخفاء كلمة المرور
window.togglePasswordVisibility = function(inputId, button) {
  const passwordInput = document.getElementById(inputId);
  if (!passwordInput) return;
  
  const icon = button.querySelector("i");
  
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    if (icon) {
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }
  } else {
    passwordInput.type = "password";
    if (icon) {
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
};

// ========== Cart API Functions ==========
window.loadCart = function() {
    fetch('/rawaq/php/cart_api.php?action=get')
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            renderCart(data.items, data.total);
            const badge = document.getElementById('cartBadge');
            if(badge) {
                let totalItems = data.items.reduce((acc, item) => acc + parseInt(item.quantity), 0);
                badge.textContent = totalItems;
                badge.style.display = totalItems > 0 ? 'inline-block' : 'none';
            }
        }
    }).catch(console.error);
};

window.renderCart = function(items, total) {
    const cartContent = document.getElementById('cartContent');
    const cartTotal = document.getElementById('cartTotal');
    if(!cartContent) return;

    if(items.length === 0) {
        cartContent.innerHTML = '<div style="text-align:center; padding:40px 0; color:#888;">السلة فارغة</div>';
        if(cartTotal) cartTotal.textContent = '0.00 $';
        return;
    }

    let html = '';
    items.forEach(item => {
        html += `
        <div class="cart-item" style="display:flex; gap:15px; border-bottom:1px solid #eee; padding-bottom:15px; margin-bottom:15px;">
            <img src="/rawaq/assets/images/products/${item.image}" style="width:70px; height:70px; object-fit:cover; border-radius:10px;">
            <div style="flex:1;">
                <h4 style="margin:0 0 5px 0; color:#3d2b1f; font-size:14px;">${item.name}</h4>
                <div style="color:#c5a059; font-weight:bold; margin-bottom:5px;">${item.price} $</div>
                <div class="cart-item-qty">
                    <div class="qty-control">
                        <button class="qty-btn minus" onclick="updateCartItem(${item.item_id}, ${item.quantity - 1})">-</button>
                        <input type="text" class="qty-input" value="${item.quantity}" readonly>
                        <button class="qty-btn plus" onclick="updateCartItem(${item.item_id}, ${item.quantity + 1})">+</button>
                    </div>
                    <button onclick="removeCartItem(${item.item_id})" style="background:none; border:none; color:#c62828; cursor:pointer; font-size:16px; margin-right:auto;"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>`;
    });
    cartContent.innerHTML = html;
    if(cartTotal) cartTotal.textContent = parseFloat(total).toFixed(2) + ' $';
};

window.updateCartItem = function(itemId, newQty) {
    if(newQty < 1) return removeCartItem(itemId);
    
    fetch('/rawaq/php/cart_api.php?action=update', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({item_id: itemId, quantity: newQty})
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) loadCart();
    });
};

window.removeCartItem = function(itemId) {
    fetch('/rawaq/php/cart_api.php?action=remove', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({item_id: itemId})
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) loadCart();
    });
};

document.addEventListener('DOMContentLoaded', () => {
    loadCart();
});