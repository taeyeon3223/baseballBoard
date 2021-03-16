class Board {
    constructor() {
        this.addEvent();
    }

    addEvent() {
        if (document.querySelector("#writeBtn")) {
            const writeBtn = document.querySelector("#writeBtn");
            writeBtn.addEventListener("click", () => {
                const list = this.getUrl();
                const link = list[0];
                const get = list[1].split("&")[0];
                if (link == "board") location.href = `/write?${get}`;
                if (link == "view") location.href = `/board?${get}`;
                if (link == "write") {
                    const title = document.querySelector("#title").value;
                    const content = document.querySelector("#content").value;
                    if (title.trim() === "" || content.trim() === "") {
                        window.alertBox("빈 값이 있습니다.");
                        return;
                    }
                    const league = get.split("=");
                    const writeData = { "title": title, "content": content, "league": league[1].split("&")[0] };
                    $.ajax({
                        url: "/write",
                        method: "POST",
                        data: writeData,
                        success: (e) => {
                            if (e == "성공") {
                                window.alertBox("작성되었습니다.", true);
                                setTimeout(() => { location.href = `/board?${get}`; }, 500);
                            } else {
                                window.alertBox("DB오류 발생. 잠시후 다시 시도해주세요.");
                            }
                        }
                    });
                }
            });
        }

        if (document.querySelector("#modifyBtn")) {
            document.querySelector("#modifyBtn").addEventListener("click", () => {
                const list = this.getUrl();
                const link = list[0];
                const get = list[1];
                if (link == "view") location.href = `/modify?${get}`;
                if (link == "modify") {
                    const url = document.location.href;
                    const id = url.split("id=")[1];
                    const title = document.querySelector("#title").value;
                    const content = document.querySelector("#content").value;
                    if (title.trim() === "" || content.trim() === "") {
                        window.alertBox("빈 값이 있습니다.");
                        return;
                    }
                    const league = get.split("=");
                    const writeData = { "id": id, "title": title, "content": content, "league": league[1].split("&")[0] };
                    $.ajax({
                        url: "/modify",
                        method: "POST",
                        data: writeData,
                        success: (e) => {
                            console.log(e);
                            if (e == "성공") {
                                window.alertBox("수정되었습니다.", true);
                                setTimeout(() => { location.href = `/view?${get}`; }, 500);
                            } else {
                                window.alertBox("DB오류 발생. 잠시후 다시 시도해주세요.");
                            }
                        }
                    });
                }
            });
        }

        if (document.querySelector("#listBtn")) {
            document.querySelector("#listBtn").addEventListener("click", () => {
                const list = this.getUrl();
                const get = list[1];
                location.href = `/board?${get.split("&")[0]}`;
            });
        }

        if (document.querySelector("#recomBtn")) {
            document.querySelector("#recomBtn").addEventListener("click", () => {
                const url = document.location.href;
                const id = url.split("id=")[1];
                $.ajax({
                    url: "/recom",
                    method: "POST",
                    data: { "id": id },
                    success: (e) => {
                        console.log(e);
                        if (e == "성공") location.reload();
                        else if (e == "실패") window.alertBox("DB오류 발생. 잠시후 다시 시도해주세요.");
                        else if (e == "중복") window.alertBox("이미 추천을 눌렀습니다.");
                    }
                });
            });
        }

        if (document.querySelector("#comaddBtn")) {
            document.querySelector("#comaddBtn").addEventListener("click", () => {
                const url = document.location.href;
                const id = url.split("id=")[1];
                const content = document.querySelector("#comment").value;
                if (content.trim() === "") {
                    window.alertBox("내용을 입력하세요.");
                    return;
                }
                $.ajax({
                    url: "/comAdd",
                    method: "POST",
                    data: { "id": id, "content": content },
                    success: (e) => {
                        if (e == "실패") window.alertBox("DB오류 발생. 잠시후 다시 시도해주세요.");
                        else {
                            const comList = JSON.parse(e);
                            const div = document.createElement("div");
                            div.classList.add("com", "w-100", "mx-auto", "d-flex");
                            div.innerHTML =
                                `<b title="${comList.writerName}">${comList.writerName}</b>
                                <pre>${comList.content}</pre>
                                <span>${comList.date}</span>`;
                            document.querySelector("#commentList").appendChild(div);
                            document.querySelector("#comment").value = "";
                        }
                    }
                })
            });
        }

        if (document.querySelector("#viewBtn")) {
            document.querySelector("#viewBtn").addEventListener("click", () => {
                const option = document.querySelector("#option").value;
                if (option * 1 < 10 || option * 1 > 50 || !Number.isInteger(option * 1 / 10)) return;
                let url = document.location.href.split("&p=")[0] + `&p=1`;
                url = url + `&option=${option}`;
                location.href = url;
            });
        }
    }

    getUrl() {
        const url = document.location.href;
        const urlList = url.split("/");
        const arr = urlList[urlList.length - 1].split("?");
        return arr;
    }
}

window.addEventListener("load", () => {
    let board = new Board();
});