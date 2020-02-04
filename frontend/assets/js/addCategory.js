import { formatCategories, createCategory } from './functions/category.js';

const addCategory = document.querySelector('#addCategory');

addCategory.addEventListener('click', createCategory);
window.addEventListener('load', () => {
  formatCategories();
});