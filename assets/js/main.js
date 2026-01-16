(() => {
  const qs = (s, el=document) => el.querySelector(s);
  const qsa = (s, el=document) => Array.from(el.querySelectorAll(s));

  
  const toggle = qs('[data-nav-toggle]');
  const navList = qs('[data-nav-list]');
  if (toggle && navList) {
    toggle.addEventListener('click', () => {
      navList.classList.toggle('open');
    });
  }

  
  const drop = qs('[data-dropdown]');
  if (drop) {
    const btn = qs('[data-dropdown-btn]', drop);
    btn.addEventListener('click', () => {
      const isOpen = drop.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(isOpen));
    });
    document.addEventListener('click', (e) => {
      if (!drop.contains(e.target)) {
        drop.classList.remove('open');
        btn.setAttribute('aria-expanded', 'false');
      }
    });
  }

  
  const modal = qs('[data-login-modal]');
  const openBtn = qs('[data-open-login]');
  const closeBtns = qsa('[data-close-login]');
  const openModal = () => {
    if (!modal) return;
    modal.classList.add('open');
    modal.setAttribute('aria-hidden', 'false');
    const first = qs('input', modal);
    first && first.focus();
  };
  const closeModal = () => {
    if (!modal) return;
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
  };
  openBtn && openBtn.addEventListener('click', (e) => {
    e.preventDefault();
    openModal();
  });
  closeBtns.forEach((b) => b.addEventListener('click', closeModal));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  
  const regForm = qs('[data-register-form]');
  if (regForm) {
    const btn = qs('[data-register-btn]', regForm);
    const checks = qsa('input[type="checkbox"]', regForm);
    const update = () => {
      const ok = checks.every(c => c.checked);
      if (btn) btn.disabled = !ok;
    };
    checks.forEach(c => c.addEventListener('change', update));
    update();
  }
})();
