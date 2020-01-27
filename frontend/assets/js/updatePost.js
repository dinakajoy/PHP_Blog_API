const loadPost = document.querySelector('#loadPost');
let editPost;
let category_id;
// <input type="hidden" id="id" name="id" value="${post.id}">
const createPost = (post) => {
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

const getId = () => {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
  return id;
}

const updatePost = async (e) => {
  e.preventDefault();
  let form = document.querySelector("#postUpdate").elements;
  let formData = {
    title: form[0].value,
    body: form[1].value,
    author: form[2].value,
    category_id: form[3].value
  }
  let id = getId();
  try {
    const response = await fetch(`http://localhost:5000/api/post/updatePost.php?id=${id}`, {method: 'PUT', body: JSON.stringify(formData)});
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const post = await response.json();
    alert(post.message);
    window.location.href = `./postDetail.html?id=${id}`;
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

const getPost = async () => {
  let id = getId();
  const response = await fetch(`http://localhost:5000/api/post/getPost.php?id=${id}`);
  const post = await response.json();
  loadPost.innerHTML = createPost(post);
  getCategories();

  editPost = document.querySelector('#editPost');
  category_id = document.querySelector('#category_id');
  editPost.addEventListener('click', updatePost);
}

window.addEventListener('load', () => {
  getPost();
})