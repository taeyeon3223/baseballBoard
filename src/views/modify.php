<section id="page" class="position-relative">
    <div id="topVisualImg" class="position-relative">
        <h1 class="m-0"><i><b>Baseball Gallary</b></i></h1>
    </div>
</section>

<section id="writePage">
    <div>
        <div id="select" class="w-100 d-flex justify-content-end">
            <div class="box">
                <button id="modifyBtn" class="btn btn-dark">수정</button>
                <button id="closeBtn" class="btn btn-dark" onclick="history.back();">취소</button>
            </div>
        </div>
        <div id="writeForm">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">제목</span>
                </div>
                <input type="text" id="title" class="form-control" value="<?= $b->title ?>">
            </div>
            <p class="mt-3">
                <span class="mr-3"><?= htmlentities($b->writerName) ?></span>
                <span class="mr-3"><?= date("y.m.d", strtotime($b->date)) ?></span>
                <span class="mr-3">조회 <?= number_format($b->views) ?></span>
                <span class="mr-3">추천 <?= number_format($b->recom) ?></span>
            </p>
            <div class="input-group">
            <div class="input-group-prepend">
                    <span class="input-group-text">내용</span>
                </div>
                <textarea id="content" class="form-control" rows="10"><?= nl2br(htmlentities($b->content)) ?></textarea>
            </div>
        </div>
    </div>

    <div class="alertBox"></div>
</section>

<script>
    function checkDelete() {
        const c = confirm("정말 삭제하시겠습니까?");
        if (c) location.href = "/delete?id=<?= $b->id ?>";
    }
</script>

<script src="js/board.js"></script>