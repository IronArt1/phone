$ docker compose up -d

# the first task is:
$ docker exec phone_ms php ladder.php

# the second task is:
$ docker exec phone_ms php matrix.php

# the third task is:
$ docker exec phone_ms composer install
http://127.0.0.1:8077/location
