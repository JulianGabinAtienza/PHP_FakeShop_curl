// On déclare nos const
const input = document.querySelector('input')
const btn = document.querySelector('.submit')
const list = document.querySelector('ul')


// AJOUT D'UNE TODO
btn.addEventListener('click', () => {
    // Si l'input de la todo n'est pas vide ...
    if (input.value.length) {
        // On crée un élément li qui contiendra notre todo
        const todo = document.createElement('li')
        // On ajoute la valeur de l'input comme contenu texte de notre todo
        todo.textContent = input.value

        // On crée le bouton de suppression avec pour contenu "X"
        // et on l'ajoute en tant qu'enfant à notre todo / li 
        const deleteBtn = document.createElement('button')
        deleteBtn.classList.add('deleteBtn')
        deleteBtn.textContent = "X"
        todo.appendChild(deleteBtn)

        // Bouton de check de la todo
        const checkbox = document.createElement('input')
        checkbox.type = 'checkbox'
        todo.appendChild(checkbox)

        checkbox.addEventListener('change', () => {
            todo.classList.toggle('checked')
        })

        // On vient ajouter à notre liste la todo en question
        list.appendChild(todo)
        // On nettoie l'input (cad on le vide après soumission)
        input.value = ""
    }
})

window.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        btn.click()
    }
})

// SUPPRESSION D'UNE TODO
list.addEventListener('click', (e) => {
    // Si la cible de notre clique possède la classe du bouton de suppression
    // Cela signifie que l'on clique sur ce bouton de suppression
    if (e.target.classList.contains('deleteBtn')) {
        // On vient donc supprimer avec remove() le parent du bouton qui n'est autre 
        // que notre todo
        e.target.parentElement.remove()
    }
})