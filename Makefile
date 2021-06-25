up: memory
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

build: memory
	./vendor/bin/sail up --build -d

test:
	./vendor/bin/sail exec php-cli vendor/bin/phpunit

migrate-fresh:
	./vendor/bin/sail artisan migrate:fresh

migrate:
	./vendor/bin/sail artisan migrate

passport-install:
	./vendor/bin/sail artisan passport:install

seed-specialization:
	./vendor/bin/sail artisan db:seed --class=SpecializationTableSeeder

assets-install:
	./vendor/bin/sail npm install

assets-rebuild:
	./vendor/bin/sail npm rebuild node-sass --force

assets-dev:
	./vendor/bin/sail npm run dev

assets-watch:
	./vendor/bin/sail npm run watch

queue:
	./vendor/bin/sail artisan queue:work

horizon:
	./vendor/bin/sail artisan horizon

horizon-pause:
	./vendor/bin/sail artisan horizon:pause

horizon-continue:
	./vendor/bin/sail artisan horizon:continue

horizon-terminate:
	./vendor/bin/sail artisan horizon:terminate

memory:
	sudo sysctl -w vm.max_map_count=262144

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache