const loadCategories = document.querySelector('#loadCategories');
const addCategory = document.querySelector('#addCategory');

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

const createCategory = async (e) => {
  e.preventDefault();
  let form = document.querySelector("#createCategory").elements;
  let formData = {
    name: form[0].value
  }
  try {
    const response = await fetch('http://localhost:5000/api/category/createCategory.php', {method: 'POST', body: JSON.stringify(formData)});
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const res= await response.json();
    alert(res.message);
    window.location.href = './';
  } catch(error) {
    console.log(error);
  }
}

addCategory.addEventListener('click', createCategory);
window.addEventListener('load', () => {
    getCategories();
})