
const newStage = document.querySelector('.new-stage-container')
const newStageI = document.querySelector('i')
const newStageExpanded = document.querySelector('.new-stage-expanded-container')
const newStageExpandedInput = document.querySelector('.stage-name-input')
// const newStageExpandedSubmit = document.querySelector('.stage-name-submit')

const newTask = document.querySelector('.add-task-container')
const newTaskExpanded = document.querySelector('.add-task-expanded-container')
const newTaskExpandedInput = document.querySelector('.task-name-input')

window.addEventListener("click", (event) => {
    if (newStage === event.target || newStageI === event.target) {
        newStage.classList.add('hidden')
        newStageExpanded.classList.remove('hidden')
    } else if (newStageExpanded != event.target && newStageExpandedInput != event.target) {
        newStage.classList.remove('hidden')
        newStageExpanded.classList.add('hidden')
    }

    document.querySelectorAll('.add-task-container').forEach(div => {
        div.addEventListener('click', function(event) {
            if (div === event.target) {
                newTask.classList.add('hidden')
                newTaskExpanded.classList.remove('hidden')
            } 
        })
    })

    // if (newTask === event.target) {
    //     newTask.classList.add('hidden')
    //     newTaskExpanded.classList.remove('hidden')
    // } else if (newTaskExpanded != event.target && newTaskExpandedInput != event.target) {
    //     newTask.classList.remove('hidden')
    //     newTaskExpanded.classList.add('hidden')
    //}
})

document.querySelectorAll('.add-task-container').forEach(div => {
    div.addEventListener('click', function(event) {
        if (div === event.target) {
            newTask.classList.add('hidden')
            newTaskExpanded.classList.remove('hidden')
        } 
    })
})

document.querySelectorAll('.add-task-expanded-container').forEach(divExpanded => {
    divExpanded.addEventListener('click', function(event) {
        if (divExpanded != event.target) {
            newTask.classList.remove('hidden')
            newTaskExpanded.classList.add('hidden')
        }
    })
})
