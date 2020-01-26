const loadPosts = document.querySelector('#loadPosts');
const loadCategories = document.querySelector('#loadCategories');

// const loadPosts = () => {

// }

const getPosts = async () => {
    const response = await fetch('http://localhost:5000/api/post/getPosts.php');
    const posts = await response.json();
    posts.forEach(post => {
        let div = document.createElement('div');
        div.className = 'post';
        let h3 = document.createElement('h3');
        h3.textContent = post.title;
        div.appendChild(h3);
        loadPosts.appendChild(div);
    })
}

const getCategories = async () => {
    const response = await fetch('http://localhost:5000/api/category/getCategories.php');
    const categories = await response.json();
    categories.forEach(category => {
        let p = document.createElement('p');
        p.textContent = category.name;
        loadCategories.appendChild(p);
    })
}

window.addEventListener('load', () => {
    getPosts();
    getCategories();
})