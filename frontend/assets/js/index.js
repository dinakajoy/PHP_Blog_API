const loadPosts = document.querySelector('#loadPosts');
const loadCategories = document.querySelector('#loadCategories');

const createPost = (post) => {
    let div = document.createElement('div');
    div.className = 'post';
    let a = document.createElement('a');
    a.setAttribute('href', `./postDetail.html?id=${post.id}`);
    a.style.color = '#333';
    let h3 = document.createElement('h3');
    h3.textContent = post.title;
    let p = document.createElement('p');
    if(post.body.length <= 40) {
        p.textContent = `${post.body}`;
    }
    p.textContent = `${post.body.slice(0, 40)}`;
    let small = document.createElement('small');
    small.textContent = 'read more...';
    small.style.color = '#888';
    p.appendChild(small);
    div.appendChild(a);
    a.appendChild(h3);
    a.appendChild(p);
    loadPosts.appendChild(div);
}

const getPosts = async () => {
    const response = await fetch('http://localhost:5000/api/post/getPosts.php');
    const posts = await response.json();
    posts.forEach(post => {
        createPost(post);
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