const loadPost = document.querySelector('#loadPost');
let editPost;
let category_id;

const createPost = (post) => {
  return `
    <form id="apiformU">
      <input type="hidden" id="id" name="id" value="${post.id}">
      <div class="input">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" autocomplete="on" required value="${post.title}">
      </div>
      <div class="input">
        <label for="body">Body</label>
        <textarea id="body" name="body" col="15" row="5" autocomplete="on" required>${post.body}</textarea>
      </div>
      <div class="input">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" autocomplete="on" required value="${post.author}">
      </div>
      <div class="input">
        <select name="category_id" id="category_id" required>
          <option>-- Select Category --</option>
        </select>
      </div>
      <button type="submit" id="editPost"> Update Post </button>
    </form>
  `;
}

const updatePost = async (e) => {
  e.preventDefault();
  console.log(e.target);
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
  // const response = await fetch(`http://localhost:5000/api/post/updatePost.php?id=${id}`);
  // const post = await response.json();
  // alert(post.message);
  // window.location.href = './postDetail.html?id=id';
}

const getCategories = async () => {
  const response = await fetch('http://localhost:5000/api/category/getCategories.php');
  const categories = await response.json();
  categories.forEach(category => {
      let option = document.createElement('option');
      option.setAttribute('value', `${category.id}`);
      option.textContent = category.name;
      category_id.appendChild(option);
  })
}

const getPost = async () => {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
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