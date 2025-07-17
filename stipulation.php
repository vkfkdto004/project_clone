<?php include 'inc_header.php'; ?>
        <main class="p-5 border rounded-5">
            <h1 class="text-center">회원 약간 및 개인정보 취급방침 동의</h1>
            <h4>회원 약관</h4>
            <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt repellat quos pariatur inventore architecto quo dolorem magni eius, esse sunt eos tempora non nobis numquam corrupti ratione alias iure dicta vel officiis. Eum, doloremque dolorem laborum porro cum nesciunt a voluptas. Aut sunt mollitia numquam voluptatum perspiciatis tenetur enim eaque hic blanditiis deleniti possimus autem deserunt esse sint neque voluptas veritatis earum consectetur, sed laboriosam iste cumque maxime! Nesciunt reprehenderit odio obcaecati vel architecto, eligendi eveniet deserunt, velit totam, quae officiis sunt. Deserunt a consequatur voluptatem vero, nemo quo eligendi quae culpa. Cumque non doloribus at expedita, dicta quas quisquam? Hic reprehenderit in iusto soluta quis accusantium sit, aspernatur maxime, cumque quae odit distinctio maiores nihil nesciunt ea animi placeat reiciendis aliquam ducimus fuga incidunt? Tenetur iusto dolor harum ab qui, reprehenderit, suscipit quibusdam aliquam quasi aut provident earum quidem. Architecto nemo dolorum magni nobis fugit ab quod voluptatum distinctio quis expedita, accusantium eius soluta praesentium amet iusto a quaerat tempora sed corporis deserunt consequatur sapiente tenetur! Accusantium officia ratione minus dignissimos, mollitia optio consectetur odio vel, id sunt cupiditate. Fugiat iusto cumque sequi sint similique perspiciatis magnam voluptate sit in mollitia, corrupti consequuntur. Cumque laborum ad iste nihil quae nemo odio, autem repellendus exercitationem nulla consequatur adipisci sapiente quia iure incidunt, aperiam excepturi quos iusto, nisi dicta voluptates doloribus explicabo temporibus saepe? Libero quasi fugiat beatae adipisci perferendis amet nemo dicta nesciunt cumque suscipit ad in officia aperiam natus quas vero repudiandae magni labore praesentium aut, magnam impedit. Dolorem vel eum esse. Eaque voluptas obcaecati maxime reprehenderit distinctio tenetur magni modi nulla, minima sit consequatur commodi officiis rerum ab facilis nobis iste quisquam aspernatur voluptatibus provident impedit quam nisi quae. Sed corrupti soluta mollitia voluptate eligendi expedita. Tenetur, nostrum vel! Perferendis, vitae fugiat unde cum rem dolorem temporibus. Saepe!
            </textarea>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="chk_member_1">
                <label class="form-check-label" for="chk_member_1">
                    위 약관에 동의하시겠습니까?
                </label>
            </div>
            <h4 class="mt-3">개인정보 취급방침</h4>
            <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima alias quas cupiditate voluptatum veniam doloremque itaque illo. Dicta aperiam omnis animi, modi vel eius ex saepe illo, repellendus, quos a aspernatur facilis eaque similique sequi. Sapiente ipsam ratione aspernatur eveniet aliquid obcaecati iure quo molestiae autem possimus repellendus corrupti et perferendis dolor animi ducimus quod maxime, laboriosam fugit, ut mollitia. Quibusdam, commodi! Atque recusandae provident hic eos dignissimos rem itaque soluta. Quidem tempora provident placeat quibusdam enim ut, nisi, cupiditate quis fugiat ex aliquid temporibus facere expedita soluta, recusandae reiciendis magnam? Amet ullam quod itaque! Neque quas maxime maiores provident, recusandae consequuntur voluptatem similique voluptatum, praesentium dignissimos distinctio placeat a quis dolor, impedit numquam expedita sed consequatur doloremque? Doloribus veniam vitae laboriosam facilis voluptate. Quae quam unde possimus odio reprehenderit explicabo saepe, iure vitae vel est rem illum architecto nam cumque dignissimos veritatis dolorem itaque quo accusantium tenetur porro dolorum non expedita! Odit maxime quis aperiam fuga nobis voluptatibus ullam esse quae dolorum quo aspernatur, iste aut et illum! Ratione facere, neque totam velit voluptatem quis rerum, soluta sit cum, placeat molestiae sapiente! Molestias eligendi in tenetur tempore autem itaque pariatur nulla maxime, assumenda cupiditate magni, blanditiis atque doloribus ut.
            </textarea>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="chk_member_2">
                <label class="form-check-label" for="chk_member_2">
                    위 개인정보 취급방침에 동의하시겠습니까?
                </label>
            </div>
            <div class="mt-4 d-flex justify-content-center gap-1">
                <button class="btn btn-primary" id="btn_member">회원가입</button>
                <button class="btn btn-secondary">가입취소</button>
            </div>
            <form method="post" name="stipulation_form" action="member_input.php" style="display:none">
                <input type="hidden" name="chk" value="0">
            </form>
        </main>
<?php include 'inc_footer.php'; ?>
