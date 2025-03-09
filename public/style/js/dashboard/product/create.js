
const keywords = [];
const keywrodsInJson = window.appData;
for (let index in keywrodsInJson) {
    keywords.push(keywrodsInJson[index]['content']);
}
const selectedKeywords = [];

function autocomplete(input, arr) {
    input.addEventListener("input", function () {
        const val = this.value.toLowerCase();
        const suggestions = arr.filter(keyword =>
            keyword.toLowerCase().includes(val) && !selectedKeywords.includes(keyword)
        );
        const dropdown = document.getElementById("autocomplete-dropdown");
        dropdown.innerHTML = "";

        suggestions.forEach(suggestion => {
            const div = document.createElement("div");
            div.textContent = suggestion;
            div.addEventListener("click", function () {
                selectedKeywords.push(suggestion);
                renderSelectedKeywords();
                input.value = "";
                dropdown.innerHTML = "";
            });
            dropdown.appendChild(div);
        });
    });
}

function renderSelectedKeywords() {
    const container = document.getElementById("selected-keywords");
    container.innerHTML = selectedKeywords.map(keyword => `
                <div class="keyword-tag" onclick="removeKeyword('${keyword}')">${keyword} &times;</div>
            `).join("");

    // Update hidden input value
    document.getElementById("keywords-hidden").value = selectedKeywords.join(",");
}

function removeKeyword(keyword) {
    const index = selectedKeywords.indexOf(keyword);
    if (index !== -1) {
        selectedKeywords.splice(index, 1);
        renderSelectedKeywords();
    }
}

window.onload = function () {
    const input = document.getElementById("keyword-input");
    autocomplete(input, keywords);
};