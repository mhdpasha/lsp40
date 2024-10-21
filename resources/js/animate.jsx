export const variants = {
    initial: {
      opacity: 0,
      y: -10,
    },
    enter: {
      opacity: 1,
      y: 0,
      transition: {
        duration: 0.3,
        ease: [0.43, 0.61, 0.33, 1],
      },
    },
    exit: {
      opacity: 0,
      y: 10, 
      transition: { duration: 0.2 },
    },
}