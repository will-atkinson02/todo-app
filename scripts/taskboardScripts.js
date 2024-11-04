// if hovering over card:
//     then create space where card was and move down
//     if dropped:
//         delete space and put card there
// else if hovering over container but not card:
//     then create space at the bottom
//     if dropped:
//         put card at bottom

let isDragging = false

document.querySelectorAll('.task').forEach(task => {
    task.addEventListener('dragstart', (event) => {
        elementId = event.target.id
        isDragging = true
    })

    task.addEventListener('dragend', () => {
        isDragging = false
    })
})

document.querySelectorAll('.task').forEach(task => {
    task.addEventListener('dragenter', (event) => {
        if (event.target.id !== elementId) { // Ensure it's not the dragged element itself
            //event.target.classList.add('hovered'); // Add hover effect
            addTaskDropArea(event.target.id)
        }
    })

    // task.addEventListener('dragover', (event) => {
    //     console.log('hovering')
    //     //event.preventDefault() // Necessary to allow dropping
    //     // You could add additional functionality while hovering here
    // })

    // task.addEventListener('dragleave', (event) => {
    //     if (event.target.id !== elementId && event.target.classList.contains('drop-placeholder-task')) { // Ensure it's not the dragged element itself
    //         removeTaskDropArea(event.target.id)
    //     }
    // })
})

window.addEventListener('dragenter', (event) => {
    if ((event.target.classList.contains('stage') || 
        event.target.classList.contains('name-and-delete') ||
        event.target.classList.contains('add-task-container')) &&
        document.querySelector('.drop-target') != null) {
        
        const dropzoneDiv = document.createElement("div");

        dropzoneDiv.classList.add('drop-placeholder-task')

        const dropTarget = event.target.querySelector(".drop-target")
        
        console.log(dropzoneDiv)

        dropTarget.appendChild(dropzoneDiv)
    }

    if (event.target.id !== elementId && !event.target.classList.contains('drop-placeholder-task')) {
        removeTaskDropArea(event.target.id)
    }

})

function addTaskDropArea(elementId) {
    if (isDragging) {
        const dropzoneDiv = document.createElement("div")

        dropzoneDiv.classList.add('drop-placeholder-task')

        const dropTarget = document.getElementById(elementId).closest(".drop-target")

        dropTarget.insertBefore(dropzoneDiv, document.getElementById(elementId))
    }

    // const dropzoneDiv = document.createElement("div");

    // dropzoneDiv.classList.add('drop-placeholder-task')

    // const dropTarget = document.getElementById(elementId).closest(".drop-target")

    // dropTarget.insertBefore(dropzoneDiv, document.getElementById(elementId));
}

function removeTaskDropArea() {
    if (document.querySelector('.drop-placeholder-task')) {
        document.querySelector('.drop-placeholder-task').remove()
    }
}

function allowDrop(event) {
    
    event.preventDefault()
}
  
function drag(event) {
    isDragging = true
    event.dataTransfer.setData("text", event.target.id)
}
  
function drop(event) {
    event.preventDefault();
    
    // Get the ID of the dragged element
    const draggedElementId = event.dataTransfer.getData("text");
    const draggedElement = document.getElementById(draggedElementId);

    // Find the parent element directly instead of relying on event.target
    const dropTargetParent = event.currentTarget; // This should be the main parent with ondrop

    // Find the specific child div where the element should be dropped
    const dropTargetChild = dropTargetParent.querySelector(".drop-target");

    // Check if the child div exists and the drop is intended on it
    if (dropTargetChild && draggedElement) {
        dropTargetParent.insertBefore(draggedElement, dropTargetChild);
    }

    isDragging = false

    removeTaskDropArea()
}

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

    if (event.target.classList.contains('deleteStage')) {
        const stageClosest = event.target.closest('.stage')
        const nameContainerClosest = event.target.closest('name-and-delete')
        const nameClosest = nameContainerClosest.querySelector('div').textContent 
    }
})

