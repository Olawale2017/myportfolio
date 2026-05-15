const serviceSelect = document.querySelector('select[name="service_id"]');
const priceLabel = document.querySelector('#selected-price');
const updatePrice = () => {
  const option = serviceSelect?.selectedOptions?.[0];
  if (!option || !option.dataset.price) {
    priceLabel.textContent = 'Select a service to see starting price.';
    return;
  }
  priceLabel.textContent = `Starting price: $${Number(option.dataset.price).toFixed(2)}`;
};
serviceSelect?.addEventListener('change', updatePrice);
updatePrice();
