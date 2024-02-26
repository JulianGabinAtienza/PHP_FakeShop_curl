import data from './data.js'

console.log(data)

const list = document.querySelector('.list')

data.forEach((item) => {
    // Créer les éléments (h1, h2, img etc) dans notre document
    const wrapper = document.createElement('div')
    const name = document.createElement('h1')
    const job = document.createElement('h2')
    const img = document.createElement('img')

    // Donner du contenu à ces éléments
    name.textContent =  item.name
    job.textContent = item.job
    img.src = item.image

    // Insérer ces éléments dans le wrapper (appendChild)
    wrapper.appendChild(name);
    wrapper.appendChild(job);
    wrapper.appendChild(img);

    // J'insère mon warpper dans la div list (cf le HTML)
    list.appendChild(wrapper)
})



// const button = document.querySelector('button')
// const output = document.querySelector('.output')

// let count = 0;

// button.addEventListener('click', () => {
//     if (count < 20) {
//         count ++;
//         output.textContent = count;
//     } 
// })