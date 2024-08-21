pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/yourusername/your-repo.git'
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent(['ec2-ssh-credentials-id']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no ec2-user@your-ec2-ip-address '
                        cd /path/to/your/app &&
                        git pull origin main
                        '
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment was successful'
        }
        failure {
            echo 'Deployment failed'
        }
    }
}
