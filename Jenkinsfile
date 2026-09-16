pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
                sh 'npm ci'
            }
        }

        stage('Build Frontend') {
            steps {
                sh 'npm run build'
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent(credentials: ['skj-app-deploy-key']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no ubuntu@172.31.13.181 \
                        "mkdir -p /var/www/skj-jewellers"

                        rsync -az --no-perms --no-owner --no-group --omit-dir-times \
                          --exclude='.env' \
                          --exclude='database/database.sqlite' \
                          --exclude='storage/' \
                          --exclude='node_modules/' \
                          ./ ubuntu@172.31.13.181:/var/www/skj-jewellers/

                        ssh -o StrictHostKeyChecking=no ubuntu@172.31.13.181 \
                        "cd /var/www/skj-jewellers && \
                         php artisan migrate --force && \
                         php artisan optimize:clear && \
                         php artisan config:cache && \
                         php artisan route:cache && \
                         php artisan view:cache && \
                         sudo chown -R www-data:www-data storage bootstrap/cache && \
                         sudo chmod -R 775 storage bootstrap/cache && \
                         sudo chown www-data:www-data database/database.sqlite && \
                         sudo chmod 664 database/database.sqlite"
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'SKJ Jewellers deployment successful!'
        }

        failure {
            echo 'SKJ Jewellers deployment failed.'
        }
    }
}