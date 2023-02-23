import React from "react";

export const Card = () => {
    return <div>Card</div>;
};

if (document.getElementById("data-wrapper")) {
    const root = createRoot(document.getElementById("data-wrapper"));
    root.render(<Card />);
}
