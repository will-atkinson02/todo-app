const newStage = document.querySelector('.new-stage-container')
const newStageExpanded = document.querySelector('.new-stage-expanded-container')

window.addEventListener("click", (event) => {
    const newStageClicked = event.target.closest('.new-stage-container')
    const newStageExpandedClicked = event.target.closest('.new-stage-expanded-container')

    if (newStageClicked) {
        newStage.classList.add('hidden')
        newStageExpanded.classList.remove('hidden')
    } else if (!newStageExpandedClicked) {
        newStage.classList.remove('hidden')
        newStageExpanded.classList.add('hidden')
    }

    const inAddTaskExpanded = event.target.closest('.add-task-expanded-container')

    if (event.target.classList.contains('add-task-container')) {
        const stageClosest = event.target.closest('.stage')

        const newTask = stageClosest.querySelector('.add-task-container')
        const newTaskExpanded = stageClosest.querySelector('.add-task-expanded-container')

        document.querySelectorAll('.stage').forEach(stage => {
            if (stage.querySelector('.add-task-container') != newTask) {
                stage.querySelector('.add-task-container').classList.remove('hidden')
                stage.querySelector('.add-task-expanded-container').classList.add('hidden')
            } else {
                newTask.classList.add('hidden')
                newTaskExpanded.classList.remove('hidden')
            }
        })

    } else if (!inAddTaskExpanded) {  
        document.querySelectorAll('.stage').forEach(stage => {
            stage.querySelector('.add-task-container').classList.remove('hidden')
            stage.querySelector('.add-task-expanded-container').classList.add('hidden')
        })
    }
})

