
const newStage = document.querySelector('.new-stage-container')
const newStageI = document.querySelector('i')
const newStageExpanded = document.querySelector('.new-stage-expanded-container')
const newStageExpandedInput = document.querySelector('.stage-name-input')
// const newStageExpandedSubmit = document.querySelector('.stage-name-submit')

window.addEventListener("click", (event) => {
    if (newStage === event.target || newStageI === event.target) {
        newStage.classList.add('hidden')
        newStageExpanded.classList.remove('hidden')
    } else if (newStageExpanded != event.target && newStageExpandedInput != event.target) {
        newStage.classList.remove('hidden')
        newStageExpanded.classList.add('hidden')
    }
})
