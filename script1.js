
const ratings = document.querySelectorAll('.rating')
const ratingsContainer = document.querySelector('.ratings-container')
const sendBtn = document.querySelector('#send')
const panel = document.querySelector('#panel')
let selectedRating = 'సంతోషించలేదు'



ratingsContainer.addEventListener('click', (e) => {
    if(e.target.parentNode.classList.contains('rating')) {
        removeActive()
        e.target.parentNode.classList.add('active')
        selectedRating = e.target.nextElementSibling.innerHTML
    }
    if(e.target.classList.contains('rating')) {
        removeActive()
        e.target.classList.add('active')
        selectedRating = e.target.nextElementSibling.innerHTML
    }

})

sendBtn.addEventListener('click', (e) => {
    panel.innerHTML = `
        
         ధన్యవాదాలు!
        అభిప్రాయం : ${selectedRating}
        మా కస్టమర్ మద్దతును మెరుగుపరచడానికి మేము మీ అభిప్రాయాన్ని ఉపయోగిస్తాము
    `
})

function removeActive() {
    for(let i = 0; i < ratings.length; i++) {
        ratings[i].classList.remove('active')
    }
}

