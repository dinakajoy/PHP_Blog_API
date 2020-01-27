const loadPost = document.querySelector('#loadPost');
let del;

const createPost = (post) => {
  return `
    <div class="spaceout">
      <small class="author">Author: ${post.author}</small>
      <small class="date">${post.created_at}</small>
    </div>
    <h2>${post.title}</h2>
    <small>Category: ${post.category_name}</small>
    <p>${post.body}</p>
    <div class="actions">
      <a href="./updatePost.html?id=${post.id}" class="btn btn--small">Update</a>
      <button id="del" class="btn btn--delete">Delete</button>
    </div>`;
}

const deletePost = async (e) => {
  e.preventDefault();
  if(confirm("Are You Sure You Want To Delete This Post?")) {
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get('id');
    const response = await fetch(`http://localhost:5000/api/post/deletePost.php?id=${id}`);
    const post = await response.json();
    alert(post.message);
    window.location.href = './index.html';
  }
}

const getPost = async () => {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
  const response = await fetch(`http://localhost:5000/api/post/getPost.php?id=${id}`);
  const post = await response.json();
  loadPost.innerHTML = createPost(post);

  del = document.querySelector('#del');
  del.addEventListener('click', deletePost);
}

window.addEventListener('load', () => {
  getPost();
})