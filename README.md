# Gitlab
> 홈랩으로 구성한 로컬 레포지토리 환경 (SSH를 이용하여 업로드)


# Github
> 외근 시에 간단하게 작업할 수 있도록 동기화

```bash
git add -> git commit -> git push

gitlab -> origin/main
github -> github/main
```


# Mini Project

인프라: Gitlab + Jeknins + Docker + Harbor 환경
개발: HTML + CSS + JavaScript + PHP + MySQL 
(PHP회원사이트 만들기 -> 유튜브 왕초보 홈페이지만들기 https://youtube.com/@kingchobo?si=Pj-aTaBTs0TX8OpT  감사합니다(_ _))


---

## CI 프로세스
1. 개발 후 Gitlab에 업로드
2. Webhook 설정 후 Jenkins에서 도커파일을 이용하여 이미지 빌드
3. 빌드된 이미지 Harbor에 업로드

## CD 프로세스 (수동 / k8s 구성 시 argoCD와 연동하여 풀 자동화 구성 예정)
1. Harbor에서 이미지 파일을 불러와 Docker에서 1차 연동 테스트 (수동)
2. 연동테스트 완료
3. k8s와 ArgoCD를 이용하여 k8s 배포 자동화 및 버전 업데이트 시 롤링업데이트 자동화



