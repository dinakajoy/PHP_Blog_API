export const getId = () => {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');
  return id;
}

export const createPost = async (e) => {
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
    window.location.href = './index.html';
  } catch(error) {
    console.log(error);
  }
}

export const getPosts = async () => {
  try {
    const response = await fetch('http://localhost:5000/api/post/getPosts.php');
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const posts = await response.json();
    return posts;
  } catch(error) {
    console.log(error);
  }   
}

export const getPost = async () => {
  let id = getId();
  try {
    const response = await fetch(`http://localhost:5000/api/post/getPost.php?id=${id}`);
    if(!response.ok) {
      throw Error (response.statusText);
    }
    const post = await response.json();
    return post;
  } catch(error) {
    console.log(error);
  }
}

export const updatePost = async (e) => {
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

export const deletePost = async (e) => {
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