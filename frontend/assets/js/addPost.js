import { formatCategories, getCategories } from './functions/category.js';
import { createPost } from './functions/posts.js';

const category_id = document.querySelector('#category_id');
const addPost = document.querySelector('#addPost');

const formatCategoryOption = async () => {
  const categories = await getCategories();
  categories.forEach(category => {
    let option = document.createElement('option');
    option.setAttribute('value', `${category.id}`);
    option.textContent = category.name;
    category_id.appendChild(option);
  })
}

addPost.addEventListener('click', createPost);
window.addEventListener('load', () => {
  formatCategories();
  formatCategoryOption();
});