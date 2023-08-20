const chatBody = document.querySelector(".chat-body");
const txtInput = document.querySelector("#txtInput");
const send = document.querySelector(".send");
const chatHeader=document.querySelector(".chat-header");
const container=document.querySelector(".container");


send.addEventListener("click", () => renderUserMessage());

txtInput.addEventListener("keyup", (event) => {
  if (event.keyCode === 13) {
    renderUserMessage();
  }
});
chatHeader.addEventListener("click",()=>{
    container.classList.toggle("collapse");
});
const renderUserMessage = () => {
  const userInput = txtInput.value;
  renderMessageEle(userInput, "user");
  txtInput.value = "";
  setTimeout(() => {
    renderChatbotResponse(userInput);
    setScrollPosition();
  }, 600);
};

const renderChatbotResponse = (userInput) => {
  const res = getChatbotResponse(userInput);
  renderMessageEle(res);
};

const renderMessageEle = (txt, type) => {
  let className = "user-message";
 
  const messageEle = document.createElement("div");
  const txtNode = document.createTextNode(txt);
  messageEle.append(txtNode);
  if (type !== "user") {
    className = "chatbot-message";
    messageEle.classList.add(className);
const botResponseContainer=document.createElement("div");
botResponseContainer.classList.add("bot-response-container");
const botImg=document.createElement("img");
botImg.setAttribute("src","data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAkJJREFUSEvt1lmoTWEUwPHf9YLMJdODkiEZCi/mN0SRKZIHlDHliTwRKQ+ilBJKIk+GkEIKD8aIZMiYUiRDZErJkFZ957Zt59x9zs1NYdWp/X1rrfNfa31rfXvX+UNS94e4/krwNDzCjXJVbaqMp2I/nmEw3uThTQWei90JtgvzawV3wHIMSI63sAnvKjRlW7xPuu1YjO/oi4dZn4Yy7o2z6JKDPMVoPM7tz05BDcLL5Bc2zbERK6sFX8TwCpmdxpiMLoJ8kNY7sTA9H8eEFGSPasB9cL9gxrvjScbmBMbjI+KIvmJFyjbMYu9tyb5SqafgcAF4Mo5mbBZhR1r3w11Mx8G01x93isAjcb4APAKXMjYRyJG0HoorGIeTaW8YLheBW6cytq8Aj67uhk8Z/TqsTuuueI452JP24ozrG7Khro4MDqFZDv4NkxBnWpLOuIcI9DYGJsVWLMUXtMHnooxL+ihnjELMcQBvpoa5mgumHc5gCOLWipK3SFXriGOYWE1XFxxvWXVktACbkzbmdkN6jpLvrQYc5R2LyDiyiD8N+YBruICY5biVyknP9HJolcYyOjoqVi/lzjhAccGHc0MSozEjOyIZ421YktZR4ij1T5IH98J1RFdXI68R2bzIGbfEqTRucYn8InnwOYyqhpixOYCZZXwi+Bi3sseRBUeJ4/waI53wqhbHLHgZttTinLGdhX21+GbBa7C2FueM7Sqsr8U3C56H+DVG4muj9MVRlX9TffoUwv+DC0v0uwz+vVL/ADAlZh8WUe4ZAAAAAElFTkSuQmCC");
botResponseContainer.append(botImg);
botResponseContainer.append(messageEle);
chatBody.append(botResponseContainer);
  }else{
    messageEle.classList.add(className);
    chatBody.append(messageEle);

  }
};

const getChatbotResponse = (userInput) => {
  return responseObj[userInput] == undefined
    ? "Please try something else"
    : responseObj[userInput];
};

const setScrollPosition = () => {
  if (chatBody.scrollHeight > 0) {
    chatBody.scrollTop = chatBody.scrollHeight;
  }
};


