const loadPost = document.querySelector('#loadPost');
const loadCategories = document.querySelector('#loadCategories');
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

const getId = () => {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
  return id;
}

const deletePost = async (e) => {
  e.preventDefault();
  if(confirm("Are You Sure You Want To Delete This Post?")) {
    let id = getId();
    try {
      const response = await fetch(`http://localhost:5000/api/post/deletePost.php?id=${id}`);
      if(!response.ok) {
        throw Error (response.statusText);
      }
      const post = await response.json();
      alert(post.message);
      window.location.href = './index.html';
    } catch(error) {
      console.log(error);
    }
  }
}

const getPost = async () => {
  let id = getId();
  try {
    const response = await fetch(`http://localhost:5000/api/post/getPost.php?id=${id}`);
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const post = await response.json();
    loadPost.innerHTML = createPost(post);

    del = document.querySelector('#del');
    del.addEventListener('click', deletePost);
  } catch(error) {
    console.log(error);
  }
}

const getCategories = async () => {
  try {
    const response = await fetch('http://localhost:5000/api/category/getCategories.php');
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const categories = await response.json();
    categories.forEach(category => {
      let p = document.createElement('p');
      p.textContent = category.name;
      loadCategories.appendChild(p);
    })
  } catch(error) {
    console.log(error);
  }
}

window.addEventListener('load', () => {
  getPost();
  getCategories();
})