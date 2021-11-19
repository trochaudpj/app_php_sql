const filters = document.querySelectorAll("#gallery-filters a")
const figures = document.querySelectorAll("#gallery .figure")

filters.forEach(filter => {
    filter.addEventListener("click", () => {
        let typefig = filter.dataset.type//.music-fig, .video-fig ou .image-fig

        document.querySelector(".active").classList.remove("active")
        filter.classList.add("active")

        figures.forEach(fig => {
            fig.classList.add("hidden")
            if (typeof typefig === "undefined" || fig.classList.contains(typefig)) {
                fig.classList.remove("hidden")
            }
        })
    })
})
