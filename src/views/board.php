<section id="page" class="position-relative">
    <div id="topVisualImg" class="position-relative">
        <h6>BASEBALL GALLERY</h6>
    </div>
</section>

<section id="boardPage">
    <div id="table">
        <h2><?= $league ?> 게시판</h2>
        <div id="select" class="w-100 d-flex justify-content-between">
            <span>Total <?= $total ?>건 <?= ceil($total / 10) ?>페이지</span>

            <div class="box">
                <!-- <select name="option" id="option">
                    <option value="default">10개씩 </option>
                </select>
                <button id="viewBtn" class="btn btn-dark">보기</button> -->
                <?php if (__SESSION) : ?>
                    <button id="writeBtn" class="btn btn-dark">글쓰기</button>
                <?php endif; ?>
            </div>
        </div>
        <table class="table">
            <colgroup>
                <col width="5%" />
                <col width="60%" />
                <col width="10%" />
                <col width="10%" />
                <col width="10%" />
                <col width="5%" />
            </colgroup>

            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>날짜</th>
                    <th>조회</th>
                    <th>추천</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($list as $b) : ?>
                    <tr>
                        <td><?= $b->id ?></td>
                        <td><a href="/view?league=<?= $league ?>&id=<?= $b->id ?>"><?= $b->title ?></a></td>
                        <td><?= $b->writerName ?></td>
                        <td><?= date("y.m.d", strtotime($b->date)) ?></td>
                        <td><?= $b->views ?></td>
                        <td><?= $b->recom ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($pg->prev) : ?>
                    <li class="page-item">
                        <a class="page-link" href="/board?league=<?= $league ?>&p=<?= $pg->start - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = $pg->start; $i <= $pg->end; $i++) : ?>
                    <li class="page-item <?= $page == $i ? "active" : "" ?>">
                        <a class="page-link" href="/board?league=<?= $league ?>&p=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($pg->next) : ?>
                    <li class="page-item">
                        <a class="page-link" href="/board?league=<?= $league ?>&p=<?= $pg->end + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</section>

<script src="js/board.js"></script>