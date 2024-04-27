const url = 'https://open-ai21.p.rapidapi.com/conversationgpt35';
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
		web_access: false,
		system_prompt: '',
		temperature: 0.9,
		top_k: 5,
		top_p: 0.9,
		max_tokens: 256
	}
};

try {
	const response = await fetch(url, options);
	const result = await response.text();
	console.log(result);
} catch (error) {
	console.error(error);
}
