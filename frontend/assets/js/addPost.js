let category_id = document.querySelector('#category_id');
const loadCategories = document.querySelector('#loadCategories');

const getCategories = async () => {
  try {
    const response = await fetch('http://localhost:5000/api/category/getCategories.php');
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const categories = await response.json();
    categories.forEach(category => {
      let option = document.createElement('option');
      option.setAttribute('value', `${category.id}`);
      option.textContent = category.name;
      category_id.appendChild(option);

      let p = document.createElement('p');
      p.textContent = category.name;
      loadCategories.appendChild(p);
    })
  } catch(error) {
    console.log(error);
  }
}

const createPost = async (e) => {
  e.preventDefault();
  let form = document.querySelector("#createPost").elements;
  let formData = {
    title: form[0].value,
    body: form[1].value,
    author: form[2].value,
    category_id: form[3].value
  }
  try {
    const response = await fetch('http://localhost:5000/api/post/createPost.php', {method: 'POST', body: JSON.stringify(formData)});
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const post = await response.json();
    alert(post.message);
    window.location.href = './';
  } catch(error) {
    console.log(error);
  }
}

editPost.addEventListener('click', createPost);
window.addEventListener('load', getCategories);