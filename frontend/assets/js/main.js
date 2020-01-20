const loadPosts = document.querySelector('#loadPosts');
const loadCategories = document.querySelector('#loadCategories');

const getPosts = async () => {
    const response = await fetch('http://localhost:5000/api/post/getPosts.php');
    const posts = await response.json();
    console.log(posts);
    posts.forEach(post => {
        loadPosts.innerHTML = `<h3>${post.title}</h3>`;
        // <p>${posts.title}</p>
    })
}

const getCategories = async () => {
    const response = await fetch('http://localhost:5000/api/category/getCategories.php');
    const categories = await response.json();
    console.log(categories);
}

window.addEventListener('load', () => {
    getPosts();
    getCategories();
})