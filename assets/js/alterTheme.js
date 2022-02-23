const html = document.querySelector("html")
const checkbox = document.querySelector("input[name=theme]")

const getStyle = (element, style) =>
    window
        .getComputedStyle(element)
        .getPropertyValue(style)

const initialColors = {
    bg: getStyle(html, '--bg'),
    text: getStyle(html, '--text'),
    linearBlack: getStyle(html, '--linear-black'),
}

const lightMode = {
    bg: "#dfdbdb",
    text: "#181818",
    linearBlack: "#dfdbdb"
}

const transformKey = key => "--" + key.replace(/([A-Z])/, "-$1").toLowerCase()

const changeColors = (colors) => {
    Object.keys(colors).map(key =>
        html.style.setProperty(transformKey(key), colors[key])
    )
}

checkbox.addEventListener("change", ({target}) => {
    target.checked ? changeColors(lightMode) : changeColors(initialColors)
})