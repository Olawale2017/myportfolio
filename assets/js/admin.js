document.querySelectorAll('form.inline select').forEach((select) => {
  select.addEventListener('change', () => select.closest('form')?.querySelector('button')?.focus());
});
