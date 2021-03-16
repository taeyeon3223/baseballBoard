<section id="page" class="position-relative">
    <div id="topVisualImg" class="position-relative">
        <h1 class="m-0"><i><b>Baseball Gallary</b></i></h1>
    </div>
</section>

<section id="writePage">
    <div id="table">
        <h2><?= $league ?> 게시판 글쓰기</h2>
        <div id="select" class="w-100 d-flex justify-content-end">
            <div class="box">
                <button id="listBtn" class="btn btn-dark">목록</button>
                <button id="writeBtn" class="btn btn-dark">작성</button>
            </div>
        </div>
        <div id="writeForm">
            <input type="text" id="title" class="form-control mb-3" placeholder="제목을 입력하세요.">
            <textarea id="content" class="form-control mb-3" rows="10"></textarea>
        </div>
    </div>

    <div class="alertBox"></div>
</section>

<script src="js/board.js"></script>