const allName = [
    'ADAM Carter',
    'ANNASSAMY Marc',
    'ATIENZA Julian',
    'BEN MAHFOUDH Chaïma',
    'BLOCTEUR Arthur',
    'BOILEAU Maxim',
    'DEVOUCHE Zacharie',
    'DUNCA Denis',
    'ESSONGHE Alex',
    'FDHIL Elyea',
    'GHEZALI Camelia',
    'HASSANI Ayoub',
    'KABA Ibrahima',
    'KHIF Sara',
    'LALANNE Samuel',
    'MABICKASSA BOUSSOUGOU Serge-Daryl',
    'MARTIN Gabriel',
    'OTABELA Juan Miguel',
    'RICHER Benjamin',
    'SOGLO Helsy Aubierge',
    'TARCHOUN Rayan',
    'THABTHIM Kevin',
    'TROUVE Rhys',
    'YAKOU Franckamour',
];

const randomNameGiver = () => {
    const randomIndex = Math.floor(Math.random() * allName.length);
    return allName[randomIndex];
}

const btn = document.querySelector('.btn');
const name = document.querySelector('.name');
const stop = document.querySelector('.stop');

let myInterval;

myInterval = setInterval(() => {
    name.textContent = randomNameGiver();
}, 50);

stop.addEventListener('click', () => {
    clearInterval(myInterval);
});

window.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        btn.click();
    }
})