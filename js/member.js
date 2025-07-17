document.addEventListener("DOMContentLoaded", () => {
    const btn_member = document.querySelector("#btn_member") // btn_member 쿼리 식별

    btn_member.addEventListener("click", () => { // 클릭 이벤트 처리 (체크박스에 체크 했는지 확인)
        const chk_member_1 = document.querySelector("#chk_member_1") // 회원 약관 동의
        if(chk_member_1.checked !== true) {
            alert("회원 약관에 동의해 주시기 바랍니다.")
            return false
        }

        const chk_member_2 = document.querySelector("#chk_member_2") // 개인정보 취급방침 동의
        if(chk_member_2.checked !== true) {
            alert("개인정보 취급방침에 동의해 주시기 바랍니다.")
            return false
        }

        const f = document.stipulation_form // member_input.php 페이지로 넘어감
        f.chk.value = 1
        f.submit()
    }) 
})