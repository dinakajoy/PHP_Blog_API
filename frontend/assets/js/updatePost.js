import { getPost, updatePost } from './functions/posts.js';
import { getCategories, formatCategories } from './functions/category.js';

const postSelector = document.querySelector('#loadPost');

const formatPostToUpdate = (post) => {
  return `
    <form id="postUpdate"> 
      <div class="input">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" autocomplete="on" required value="${post.title}">
      </div>
      <div class="input">
        <label for="body">Body</label>
        <textarea id="body" name="body" cols="30" rows="10" autocomplete="on" required>${post.body}</textarea>
      </div>
      <div class="input">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" autocomplete="on" required value="${post.author}">
      </div>
      <div class="input">
        <select name="category_id" id="category_id" required>
          <option value=${post.category_id} selected>${post.category_name}</option>
        </select>
      </div>
      <button type="submit" id="editPost" class="editPost"> Update Post </button>
    </form>
  `;
}

const formatCategoryOption = async () => {
  const categories = await getCategories();
  categories.forEach(category => {
    let option = document.createElement('option');
    option.setAttribute('value', `${category.id}`);
    option.textContent = category.name;
    const category_id = document.querySelector('#category_id');
    category_id.appendChild(option);
  })
}

const loadPostToUpdate = async () => {
  const post = await getPost();
  postSelector.innerHTML = formatPostToUpdate(post);
  formatCategoryOption();
}

window.addEventListener('load', async () => {
  await loadPostToUpdate();
  await formatCategories();
  await formatCategoryOption();
  editPost.addEventListener('click', updatePost);
})