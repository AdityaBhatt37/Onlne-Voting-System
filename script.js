// Array of strings (You can add as many strings as you want)
const paragraphArray = [
    "We have to face the future with courage and confidence. Democracy is not a system of government. It is a way of life.  ----Indira Gandi",
    "Elections are a reflection of the people's will. It is not just a process of voting but a process of giving hope and vision for the future. ---Mahatma Gandhi",
    "Elections are a reflection of the people's will. It is not just a process of voting but a process of giving hope and vision for the future. -Dr.B.R.Ambetkar",
    "A free and fair election is the backbone of democracy. It is an instrument to build a future for the generations to come. ---Narendra Modi",
    "In elections, the power lies with the common man. A strong and democratic election system ensures that every vote counts  ----Sonia Gandhi",
    "The future of India lies in the hands of the people. Let the people decide, and let us work to make democracy a real and living force. ---Rahul Gandhi"
];

// Function to get a random item from the array
function getRandomParagraph() {
    const randomIndex = Math.floor(Math.random() * paragraphArray.length);
    return paragraphArray[randomIndex];
}

// Select the paragraph element
const randomParagraphElement = document.getElementById("randomParagraph");

// Set the text content of the paragraph to a random string from the array
randomParagraphElement.textContent = getRandomParagraph();
