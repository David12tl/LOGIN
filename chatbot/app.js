const API_KEY = "yourapikey";

async function getCompletion(prompt) {
    const url = 'https://open-ai21.p.rapidapi.com/conversationmpt';
    const options = {
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-RapidAPI-Key': '1a7cc01117mshb2fdbd9b431d086p1287c6jsn4a7190de9bf0',
            'X-RapidAPI-Host': 'open-ai21.p.rapidapi.com'
        },
        body: {
            messages: [
                {
                    role: 'user',
                    content: 'hello'
                }
            ],
            web_access: false
        }
    };
    
    try {
        const response = await fetch(url, options);
        const result = await response.text();
        console.log(result);
    } catch (error) {
        console.error(error);
    }

  const data = await response.json();
  // console.log(data)
  return data;
}

// getCompletion()

const prompt = document.querySelector("#prompt");
const button = document.querySelector("#generate");
const output = document.querySelector("#output");

button.addEventListener("click", async () => {
  console.log(prompt.value);

  if (!prompt.value) window.alert("Please enter a prompt");

  const response = await getCompletion(prompt.value);
  console.log(response);
  output.innerHTML = response.choices[0].text;
});