const categorySelector = document.querySelector('#categories');

export const createCategory = async (e) => {
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

export const formatCategories = async () => {
  const categories = await getCategories();
  categories.forEach(category => {
    let div = document.createElement('div');
    div.className = 'editCategory';

    let p = document.createElement('p');
    p.setAttribute('contenteditable', true);
    p.setAttribute('id', category.id);
    p.textContent = category.name;

    let editBtn = document.createElement('i');
    editBtn.classList ="fa fa-pencil-square-o editBtn";
    div.appendChild(p);
    div.appendChild(editBtn);
    categorySelector.appendChild(div);
  })
}

export const getCategories = async () => {
  try {
    const response = await fetch('http://localhost:5000/api/category/getCategories.php');
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const categories = await response.json();
    return categories;
  } catch(error) {
    console.log(error);
  }
}

const updateCategory = async (value, id) => {
  let formData = {
    name: value
  }
  let cat_id = id;
  console.log(value);
  console.log(id);
  try {
    const response = await fetch(`http://localhost:5000/api/category/updateCategory.php?id=${cat_id}`, { method: 'PUT', body: JSON.stringify(formData) });
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const category = await response.json();
    alert(category.message);
    window.location.href = './index.html';
  } catch(error) {
    console.log(error);
  }
};

const editCategory = (e) => {
  let elem = e.target.previousElementSibling;
  if(e.target.classList.contains('editBtn')) {
    elem.focus();
    elem.addEventListener('keypress', (e) => {
      if (e.keyCode === 13 || e.which === 13) {
        elem.blur();
      }
    })
    elem.addEventListener('blur', () => {
      updateCategory(elem.innerText, elem.id);
    })
  }
}

categorySelector.addEventListener('click', editCategory);