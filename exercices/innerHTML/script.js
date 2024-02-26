const input = document.querySelector('#input')
const output = document.querySelector('.output')
const btn = document.querySelector('button')

btn.addEventListener('click', () => {
    output.innerHTML = input.value
    input.value = ""
})

alert('<h1>Salut</h1>')