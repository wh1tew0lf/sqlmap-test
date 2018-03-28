# sqlmap-test
vulnerable site for test sqlmap

## How to use
1. Clone or download to your PC;
2. Install docker on your PC;
3. Run: ```docker run -it --rm -v <path>:/app -p8082:80 --name sqlmap_test php php -S 0.0.0.0:80 -t /app``` where <path> - path to downloaded folder from step 1;
4. Run ```docker run --rm -it --link sqlmap_test -v /tmp/sqlmap:/root/.sqlmap/ --entrypoint /bin/sh paoloo/sqlmap```;
5. Inside the sqlmap container you can run commands like: ```python sqlmap.py --url sqlmap_test:80/edit.php?id=1```;
