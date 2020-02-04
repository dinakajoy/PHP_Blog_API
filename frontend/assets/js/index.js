import { getPosts } from './functions/posts.js';
import { formatCategories } from './functions/category.js';
 
const posts = document.querySelector('#posts');

const formatPosts = (post) => {
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
  } else {
    p.textContent = `${post.body.slice(0, 100)}`;
    let small = document.createElement('small');
    small.textContent = ' read more...';
    small.style.color = '#888';
    p.appendChild(small);
  }
  div.appendChild(a);
  a.appendChild(h3);
  a.appendChild(p);
  posts.appendChild(div);
}
const loadPosts = async () => {
  const posts = await getPosts();
  posts.forEach(post => {
    formatPosts(post);
  })
}

window.addEventListener('load', () => {
  loadPosts();
  formatCategories();
})