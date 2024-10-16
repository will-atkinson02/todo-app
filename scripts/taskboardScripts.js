

const newStage = document.querySelector('.new-stage-container')
const newStageExpanded = document.querySelector('.new-stage-expanded-container')

window.addEventListener("click", (event) => {
    if (newStage === event.target) {
        newStage.classList.toggle('hidden')
        newStageExpanded.classList.toggle('hidden')
    }

    
    if (!newStageExpanded.contains(event.target)) {
        newStage.classList.toggle('hidden')
        newStageExpanded.classList.toggle('hidden')
    }
   
})
