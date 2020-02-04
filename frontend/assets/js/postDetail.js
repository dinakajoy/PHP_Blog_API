import { getPost, deletePost } from './functions/posts.js';
import { formatCategories } from './functions/category.js';
 
const postSelector = document.querySelector('#post');

const formatPost = (post) => {
  return `
    <div class="spaceout">
      <small class="author">Author: ${post.author}</small>
      <small class="date">${post.created_at}</small>
    </div>
    <br />
    <h2>${post.title}</h2>
    <br />
    <small>Category: ${post.category_name}</small>
    <br />
    <p>${post.body}</p>
    <br />
    <div class="actions">
      <a href="./updatePost.html?id=${post.id}" class="btn btn--small">Update</a>
      <button id="del" class="btn btn--delete">Delete</button>
    </div>`;
}
const loadPost = async () => {
  const post = await getPost();
  postSelector.innerHTML = formatPost(post);
  let del = document.querySelector('#del');
  del.addEventListener('click', deletePost);
}

window.addEventListener('load', () => {
  loadPost();
  formatCategories();
})