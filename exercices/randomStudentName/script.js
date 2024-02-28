import allName from './allName.js'

const randomNameGiver = () => {
    const randomIndex = Math.floor(Math.random() * allName.length);
    return allName[randomIndex];
}

const name = document.querySelector('.name');
const stop = document.querySelector('.stop');

let myInterval;

myInterval = setInterval(() => {
    name.textContent = randomNameGiver();
}, 50);

stop.addEventListener('click', () => {
    clearInterval(myInterval);
});