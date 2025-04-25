# Use latest Node.js LTS
FROM node:22

LABEL authors="rsruman"

# Set working directory inside the container
WORKDIR /app

# Copy all frontend source code into the container
COPY . .

# Install dependencies
RUN npm install

# Expose Vite's default port
EXPOSE 5173

# Start the Vite dev server and allow access from host
CMD ["npm", "run", "dev", "--", "--host"]
